<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Student;

class StudentsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function __construct()
    {
        // We have no interest in testing Eloquent
        $this->mock = \Mockery::mock('Eloquent', 'App\Student');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testIndex()
    {
        $response = $this->call("GET","/student");
        $this->assertViewHas("students");
        $this->assertEquals(200, $response->getStatusCode());
        //dd($response->getStatusCode());
        //dd(get_class_methods($response));
        //$this->assertTrue(true);
    }

    public function testStoreMethod(){

        $this->mock
            ->shouldReceive('create')
            ->once();

        $this->app->instance('App\Student', $this->mock);
        $response = $this->call("POST","/student");
        //$this->assertRedirectedToRoute("student.index");
        //$this->assertSessionHasErrors(['title']);
       //$this->assertRedirectedToAction("StudentController@index");
        $this->assertEquals(302, $response->getStatusCode());
    }

    /*public function testCreateMethod(){
        $response = $this->call("GET","/student");
    }*/
}
