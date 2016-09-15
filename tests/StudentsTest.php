<?php

class StudentsTest extends TestCase
{

    private $mock;

    /**
     * A basic test example.
     */
    public function setUp() {
        parent::setUp();
        $this->mock = Mockery::mock('Eloquent', '\App\Student');
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
    }

    public function testStoreMethod(){

        $this->mock
            ->shouldReceive('create')
            ->once();

        $this->app->instance('\App\Student', $this->mock);
        $this->call("POST","/student", ['username' => random_int(1,5000), 'password' => '123']);
        $this->assertRedirectedToRoute("student.index");
    }

    /*public function testCreateMethod(){
        $response = $this->call("GET","/student");
    }*/
}
