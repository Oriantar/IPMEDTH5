<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\inbraakMelding;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InbraakMeldingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function flappycam_can_make_inbraak_melding()
    {
        
        $user = User::factory()->create();
        DB::table('sensorids')->insert([
            'id' => 1,
            'sensorid' => 'flappy_is_beste',
            'cameraNaam' => 'flappy_is_beste',
            'user_id' => $user->id,            
        ]);

        $response = $this
            ->actingAs($user)
            ->patch('/inbraakmelding/flappy_is_beste/camerabeeld?url=1', [
                'name' => 'Test User',
                'email' => $user->email,
            ]);
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');
        
        $this->assertSame(1, inbraakMelding::count());
    }
}