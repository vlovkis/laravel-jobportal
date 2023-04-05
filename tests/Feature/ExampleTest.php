<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Listing;

use App\Models\User as user2;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_pradziosStatusas()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function test_loginStatusas(){

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_manageStatusas(){

        $response = $this->get('/listings/manage');

        $response->assertStatus(200);
    }

    public function test_pricingStatusas(){

        $response = $this->get('/listings/pricing');

        $response->assertStatus(200);
    }

    public function test_registerStatusas(){

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_contactStatusas(){

        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_profileStatusas(){

        $response = $this->get('/profile');

        $response->assertStatus(200);
    }


    public function testUserAuthentication()
{
    $this->withoutMiddleware();
    // Create a user
    $user = user2::factory()->create([
        'email' => 'email@email.com',
        'password' => bcrypt('password123'),
    ]);

    $response = $this->actingAs($user)->get('/');

    $response->assertRedirect('/');
    $response->assertStatus(302);
    // Make a request that requires authentication
    $response = $this->get('/');
}
public function testScopeFilter()
{
    // Create a user and some listings
    $this->withoutMiddleware();
    $user = user2::factory()->create();
    $listings = Listing::factory()->count(3)->create(['user_id' => $user->id]);

    // Filter by tag
    $response = $this->get('/listings?tag=laravel');
    $response->assertOk();

    // Check that the filtered listings match the expected titles
    $filteredTitles = $response->viewData('listings')->pluck('title')->toArray();
    $this->assertEquals(['Laravel Job 1', 'Laravel Job 3'], $filteredTitles);

    // Check that unfiltered listings are not present in the filtered list
    foreach ($listings as $listing) {
        if (!in_array($listing->title, $filteredTitles)) {
            $this->assertFalse(strpos($response->getContent(), $listing->title));
        }
    }

    // Filter by search term
    $response = $this->get('/listings?search=job');
    $response->assertOk();

    // Check that the filtered listings match the expected titles
    $filteredTitles = $response->viewData('listings')->pluck('title')->toArray();
    $this->assertEquals(['Laravel Job 1', 'Laravel Job 2', 'Laravel Job 3'], $filteredTitles);

    // Check that unfiltered listings are not present in the filtered list
    foreach ($listings as $listing) {
        if (!in_array($listing->title, $filteredTitles)) {
            $this->assertFalse(strpos($response->getContent(), $listing->title));
        }
    }
}

public function testStoreListing()
{
    $this->withoutMiddleware();
    // Create a fake user and authenticate it
    $user = user2::create([
        'name' => 'Test User',
        'email' => 'test4@example.com',
        'country' => 'Turkey',
        'password' => bcrypt('password'),
    ]);
    $this->actingAs($user);

    // Prepare the form data
    $formFields = [
        'title' => 'Test Listing',
        'company' => 'Test Company',
        'location' => 'Test Location',
        'website' => 'http://test.com',
        'email' => 'test4@test.com',
        'tags' => 'test',
        'description' => 'Test Description'
    ];


    // Make a POST request to the store function with the form data and file
    $response = $this->post('/listings', array_merge($formFields));

    // Assert that the listing was created
    $this->assertDatabaseHas('listings', [
        'title' => 'Test Listing',
        'company' => 'Test Company',
        'location' => 'Test Location',
        'website' => 'http://test.com',
        'email' => 'test4@test.com',
        'tags' => 'test',
        'description' => 'Test Description',
        'user_id' => $user->id
    ]);

    // Assert that the response is a redirect to the homepage with a success message
    $response->assertRedirect('/');
    $response->assertSessionHas('message', 'Listing Created');
}

public function testUserListingsRelationship()
{
    $this->withoutMiddleware();
    // Create a user
    $user = user2::factory()->create();

    // Create three listings for the user
    $listings = Listing::factory()->count(3)->create(['user_id' => $user->id]);

    // Get the user's listings and assert that there are three
    $userListings = $user->listings;
    $this->assertCount(3, $userListings);

    // Assert that each listing belongs to the user
    foreach ($listings as $listing) {
        $this->assertTrue($userListings->contains($listing));
    }
}

public function testUserRelationship()
{
    $this->withoutMiddleware();
    // Create a new listing
    $user = user2::factory()->create();
    $listing = Listing::factory()->create(['user_id' => $user->id]);

    // Get the related user
    $listingUser = $listing->user;

    // Assert that the user is an instance of the User model
    $this->assertInstanceOf(User::class, $user);

    // Assert that the user has a matching ID to the listing's user_id
    $this->assertEquals($user->id, $listingUser->id);
}

/** @test */
public function testIt_submits_the_contact_form()
{
    $this->withoutMiddleware();
    // Mock the email sending
    Mail::fake();

    // Submit the contact form
    $response = $this->post('/contact', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '123-456-7890',
        'subject' => 'Test Subject',
        'message' => 'Test Message'
    ]);

    // Assert that the response is a redirect back with a success message
    $response->assertRedirect()->assertSessionHas('success', 'We have received your message and would like to thank you for writing to us.');

    // Assert that the contact was saved to the database
    $this->assertDatabaseHas('contacts', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '123-456-7890',
        'subject' => 'Test Subject',
        'message' => 'Test Message'
    ]);

    // Assert that an email was sent to the admin
    Mail::assertSent(function ($email) {
        return $email->hasTo('digambersingh126@gmail.com') &&
               $email->subject === 'Test Subject';
    });
}

public function testLogout()
{
    $this->withoutMiddleware();
    // Create a user and log them in
    $user = user2::factory()->create();
    $this->actingAs($user);

    // Make a request to the logout endpoint
    $response = $this->post('/logout');

    // Assert that the user was logged out and redirected to the homepage
    $response->assertRedirect('/');
    $this->assertGuest();
}

public function testUpdateListing()
{
    $this->withoutMiddleware();
    // Create a user and a listing
    $user = user2::factory()->create();
    $listing = Listing::factory()->create(['user_id' => $user->id]);

    // Login as the user
    $this->actingAs($user);

    // Make a PUT request to update the listing
    $response = $this->put('/listings/' . $listing->id, [
        'title' => 'New Title',
        'company' => 'New Company',
        'location' => 'New Location',
        'website' => 'https://newwebsite.com',
        'email' => 'newemail@example.com',
        'tags' => 'New Tags',
        'description' => 'New Description',
    ]);

    // Check that the listing was updated in the database
    $this->assertDatabaseHas('listings', [
        'id' => $listing->id,
        'title' => 'New Title2',
        'company' => 'New Company',
        'location' => 'New Location',
        'website' => 'https://newwebsite.com',
        'email' => 'newemail@example.com',
        'tags' => 'New Tags',
        'description' => 'New Description',
    ]);

    // Check that the response redirects back with a success message
    $response->assertRedirect();
    $response->assertSessionHas('message', 'Listing updated successfully!');
}

public function testMyFunction()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        // Assert something about the response
    }

    public function testItDeletesListing()
{
    $this->withoutMiddleware();
    $user = user2::factory()->create();
    $listing = Listing::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user)
         ->delete(route('listings.destroy', $listing))
         ->assertRedirect('/');

    $this->assertDatabaseMissing('listings', ['id' => $listing->id]);
}

public function testItShowsManageListingPage()
{
    // create a user
    $user = user2::factory()->create();
    // sign in the user
    $this->actingAs($user);
    // create listings associated with the user
    $listings = Listing::factory()->count(3)->create(['user_id' => $user->id]);
    
    // make GET request to manage listings page
    $response = $this->get(route('listings.manage'));
    
    // assert that response is successful
    $response->assertSuccessful();
    // assert that response view is correct
    $response->assertViewIs('listings.manage');
    // assert that response contains all listings associated with the user
    foreach ($listings as $listing) {
        $response->assertSee($listing->title);
    }
}



}
