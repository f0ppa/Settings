<?php namespace Arcanedev\Settings\Tests;

use Arcanedev\Settings\SettingsServiceProvider;

/**
 * Class     SettingsServiceProviderTest
 *
 * @package  Arcanedev\Settings\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SettingsServiceProviderTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var SettingsServiceProvider */
    private $provider;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(SettingsServiceProvider::class);
    }

    public function tearDown()
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\ServiceProvider::class,
            \Arcanedev\Support\PackageServiceProvider::class,
            \Arcanedev\Settings\SettingsServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides()
    {
        $expected = [
            'arcanedev.settings.manager',
            'arcanedev.settings.store',
            \Arcanedev\Settings\Contracts\Store::class,
        ];

        $this->assertEquals($expected, $this->provider->provides());
    }

    /** @test */
    public function it_can_get_the_settings_store()
    {
        $abstracts = [
            'arcanedev.settings.store',
            \Arcanedev\Settings\Contracts\Store::class,
        ];

        foreach ($abstracts as $abstract) {
            $store = $this->app->make($abstract);

            $this->assertInstanceOf(\Arcanedev\Settings\Bases\Store::class, $store);
            $this->assertInstanceOf(\Arcanedev\Settings\Contracts\Store::class, $store);
        }
    }
}
