<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Alarm;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AlarmTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    
    public function flappycam_can_change_alarm_to_true()
    {   
        DB::table("alarms")->insert([
            'alarm' => 0,
        ]);

        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/alarm');
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('instellingen');
    
        $this->assertSame(1, Alarm::first()->alarm);
        $response = $this
            ->actingAs($user)
            ->get('/alarm');
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('instellingen');
        $this->assertSame(0, Alarm::first()->alarm);  
       }   
}