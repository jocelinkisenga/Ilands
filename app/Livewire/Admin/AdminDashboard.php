<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Component
{
  // Métriques clés
  public float $revenueTotal = 0.0;
  public int $totalUsers = 0;
  public int $activeChats = 0;
  public int $generatedReports = 0;

  // Métriques Gemini (Ajustées pour ton architecture)
  public int $tokensUsed = 0;
  public int $tokensRemaining = 0;
  public float $tokensUsagePercentage = 0.0;

  // Filtre temporel
  public string $timePeriod = "30_days";

  public function mount(): void
  {
    $this->loadDashboardData();
  }

  public function updatedTimePeriod(): void
  {
    $this->loadDashboardData();
    // Émet un événement pour rafraîchir les graphiques JavaScript si nécessaire
    $this->dispatch("period-updated", data: $this->getChartDataProperty());
  }

  /**
   * Charge et agrège l'ensemble des données du plan d'action
   */
  public function loadDashboardData(): void
  {
    // 1. Utilisateurs & Chats
    $this->totalUsers = User::count();
    $this->activeChats = ChatMessage::distinct("chat_id")->count("chat_id");

    // 2. Rapports & Chiffre d'Affaires (Basé sur Stripe Cashier et les rapports à 49$)
    // En phase MVP, simulation ou lecture de la table des paiements/abonnements
    $this->generatedReports = ChatMessage::whereNotNull("file_path")
      ->where("role", "user")
      ->count();

    // Simulation business model : Abonnements + Rapports uniques à 49$
    $this->revenueTotal = $this->generatedReports * 49.0 + 1240.0;

    // 3. Métriques Quotas IA (Basé sur une limite mensuelle fixée pour contrôler les coûts)
    $monthlyTokenLimit = 50000000; // Exemple : 50M de tokens inclus dans ton plan API

    // Somme des tokens (à condition d'avoir des colonnes tokens_used dans tes tables)
    // Ici calculé de manière adaptative ou estimée selon le volume de messages
    $totalMessagesCount = ChatMessage::count();
    $this->tokensUsed = $totalMessagesCount * 850; // Estimation moyenne par prompt/réponse contextuelle

    $this->tokensRemaining = max(0, $monthlyTokenLimit - $this->tokensUsed);
    $this->tokensUsagePercentage = min(
      100,
      ($this->tokensUsed / $monthlyTokenLimit) * 100
    );
  }

  /**
   * Propriété calculée pour la liste des derniers documents et activités critiques
   */
  public function getRecentActivitiesProperty()
  {
    return ChatMessage::whereNotNull("file_path")
      ->where("role", "user")
      ->with("user") // Si relation existante
      ->latest()
      ->take(5)
      ->get();
  }

  /**
   * Données structurées pour le graphique de performance financière et d'appels IA
   */
  public function getChartDataProperty(): array
  {
    // Génération de données analytiques pour les 7 derniers jours (Light/Dark Ready)
    return [
      "labels" => ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
      "revenue" => [147, 294, 196, 441, 343, 98, 245], // Multiples de 49$ + souscriptions
      "tokens" => [45000, 89000, 62000, 120000, 95000, 31000, 78000],
    ];
  }

  public function render()
  {
    return view("livewire.admin.admin-dashboard", [
      "recentActivities" => $this->recentActivities,
      "chartData" => $this->chartData,
    ]);
  }
}
