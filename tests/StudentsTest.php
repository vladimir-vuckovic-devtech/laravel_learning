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

    public function testCreateMethod(){
        $response = $this->call("GET","/student/create");
        $this->assertTrue(strpos(strtolower($response->getContent()), "create student") !== false);
        //dd($response->getContent());

        /*$crawler = $this->client()->request("GET", "/student/create");
        $res = $crawler->fliter("body: contains('Students')");
        var_dump($res);*/

    }

    public function testEditMethod(){
        $response = $this->call("GET","/student/2/edit");
        $this->assertTrue(strpos(strtolower($response->getContent()), "student edit") !== false);
        //dd($response->getContent());

    }

    public function testUpdateMethod(){

        $user = ["username" => "Sandin", "password" => "medjedovic"];

        $this->mock
            ->shouldReceive("findOrFail")
            ->with(5)
            ->once()
            ->andReturn($this->mock->shouldIgnoreMissing());

        //dd(get_class_methods($this->mock));

        $this->mock
            ->shouldReceive("save")
            ->once()
            ->andReturn(true);

        $this->app->instance('\App\Student', $this->mock);
        $this->call("PUT", "/student/5", $user);
        $this->assertRedirectedToRoute("student.index");

    }

    public function testDestroyMethod(){
        $this->mock
            ->shouldReceive("find")
            ->with(7)
            ->once()
            ->andReturn($this->mock);

        $this->mock
            ->shouldReceive('delete')
            ->once()
            ->andReturn(true);

        $this->app->instance('\App\Student', $this->mock);
        $this->call("DELETE", "/student/7");
        $this->assertRedirectedToRoute("student.index");

    }
}
