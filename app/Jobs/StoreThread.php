<?php

namespace App\Jobs;

use App\Thread;
use App\Http\Requests\ThreadRequest;
use Illuminate\Support\Facades\Auth;

class StoreThread
{
    private $subject;

    private $body;

    private $tags;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $body, array $tags)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->tags = $tags;
    }

    public static function fromRequest(ThreadRequest $request)
    {
        return new static(
            $request->subject,
            $request->body,
            $request->tags
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Auth $auth)
    {
        $thread = new Thread;
        $thread->subject = $this->subject;
        $thread->slug = str_slug($this->subject . '-' . str_random(8));
        $thread->body = $this->body;
        
        Auth::user()->threads()->save($thread);

        foreach ($this->tags as $value) {
            $thread->tags()->attach($value);
        }

        return $thread;
    }
}
