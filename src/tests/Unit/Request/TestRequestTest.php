<?php

namespace Tests\Unit\Request;

use App\Http\Requests\TestRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TestRequestTest extends TestCase
{
    /**
     * @group testValidation
     * @dataProvider provideTestData
     */
    public function testValidation($input, $expected): void
    {
        $request = new TestRequest();
        $validator = Validator::make($input, $request->rules());
        $this->assertEquals($expected, $validator->passes());
    }

    public function provideTestData()
    {
        return [
            '正常' => [
                [
                    'title' => 'sample title',
                    'body' => 'sample body'
                ],
                true
            ],
            'エラー' => [
                [
                    'title' => 'sample title',
                ],
                false
            ]
        ];
    }
}
