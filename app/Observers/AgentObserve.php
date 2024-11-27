<?php

namespace App\Observers;

use App\Models\Agent;
use Illuminate\Support\Facades\Log;

class AgentObserve
{
    /**
     * Handle the Agent "created" event.
     */
    public function created(Agent $agent): void
    {
        Log::info('Agent has been created at:' . now() . ' with ID:' . $agent->id);
    }

    /**
     * Handle the Agent "updated" event.
     */
    public function updated(Agent $agent): void
    {
        Log::info('Agent has been updated at:' . now() . '  with ID:' . $agent->id);
    }

    /**
     * Handle the Agent "deleted" event.
     */
    public function deleted(Agent $agent): void
    {
        Log::info('Agent has been deleted at:' . now() . ' with ID:' . $agent->id);
    }

    /**
     * Handle the Agent "restored" event.
     */
    public function restored(Agent $agent): void
    {
        Log::info('Agent has been restored at:' . now() . ' with ID:' . $agent->id);
    }

    /**
     * Handle the Agent "force deleted" event.
     */
    public function forceDeleted(Agent $agent): void
    {
        Log::info('Agent has been forceDeleted at:' . now() . ' with ID:' . $agent->id);
    }
}
