<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BastionPanelTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_admin_can_open_bastion_resources(): void
    {
        $admin = User::where('email', 'admin@example.com')->firstOrFail();

        foreach (['/admin/users', '/admin/roles', '/admin/permissions'] as $uri) {
            $this->actingAs($admin)->get($uri)->assertOk();
        }
    }

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get('/admin/roles')->assertRedirect('/admin/login');
    }
}
