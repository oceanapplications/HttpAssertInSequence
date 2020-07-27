# Installation

`composer require oceanapplications/httpassertinsequence`

Add or replace the http alias in app/config with

`'Http' => OceanApplications\HttpAssertInSequence\Http::class,` 

Use alias in all your files

`use Http;`


# Usage

Works just like assertSent but allows you to specify which request to check

```
        Http::fake([
            '*' => Http::sequence()
                ->push(['data' => [ [] ] ], 200) // get customer, none found
                ->push(['data' => ['id' => 1] ], 200) // create customer
        ]);
        $response = $this->post('createOrUpdate', ['email' => 'test@example.com']);

        Http::assertSentInSequence(function(Request $request) {
            
            return $request['email'] == 'test@example.com';
        }, 1);
```
