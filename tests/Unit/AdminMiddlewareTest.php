<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\VerifyAdmin;

class AdminMiddlewareTest extends TestCase
{
    use DatabaseMigrations;

    public function testAdminMiddlewareFails()
    {
        $request = new \Illuminate\Http\Request();

        $user = factory(\App\User::class)->create(['role' => 'teammate']);

        Auth::login($user);

        $middleware = new VerifyAdmin;

        $result = $middleware->handle($request, function(){ return 'passed'; });

        $this->assertEquals(302, $result->getStatusCode());

    }

    public function testAdminMiddlewareSucceeds()
    {
        $request = new \Illuminate\Http\Request();

        $user = factory(\App\User::class)->create(['role' => 'admin']);

        Auth::login($user);

        $middleware = new VerifyAdmin;

        $result = $middleware->handle($request, function(){ return 'passed'; });

        $this->assertEquals('passed', $result);
    }
}
