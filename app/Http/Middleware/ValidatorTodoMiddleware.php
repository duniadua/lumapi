<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use Dingo\Api\Exception\StoreResourceFailedException;

class ValidatorTodoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'description' => 'required',
        ]);

        if ($validator->fails()) {
            throw new StoreResourceFailedException('Update Fails ', $validator->errors());
        }
        
        return $next($request);
    }
}
