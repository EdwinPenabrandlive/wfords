<?php

namespace Tests\Feature\Services;

use App\Services\Dictionary;
use App\Services\WordGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordGeneratorTest extends TestCase
{
    /** @test */
    public function it_should_return_a_instance()
    {
        $dictionary = new Dictionary();

        $generator = new WordGenerator($dictionary);

        $this->assertInstanceOf(WordGenerator::class, $generator);
    }

    /** @test */
    public function generate_an_array_of_valid_words()
    {
        $length = 7;
        $string = 'TJEUINGRTSDA';

        $dictionary = new Dictionary();

        $generator = new WordGenerator($dictionary);
        $words = $generator
            ->wordsFrom($string)
            ->withLength($length)
            ->getWords();

        $this->assertContains('tijeras', $words);
        $this->assertContains('turista', $words);
        $this->assertContains('negrita', $words);
        $this->assertContains('gánster', $words);

    }
}
