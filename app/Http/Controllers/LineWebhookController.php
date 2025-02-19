<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LineService;
use Illuminate\Support\Facades\Log;

class LineWebhookController extends Controller
{
    protected $lineService;

    public function __construct(LineService $lineService)
    {
        $this->lineService = $lineService;
    }

     /**
     * 處理 Webhook 請求
     */
    public function handle(Request $request)
    {
        $events = $request->input('events', []);

        Log::info('Webhook request received', ['request' => $request->all()]);

        foreach ($events as $event) {
            // 處理follow事件
            if ($event['type'] === 'follow') {
                $this->handleFollowEvent($event);
            }

            // 處理文字訊息
            if ($event['type'] === 'message' && $event['message']['type'] === 'text') {
                $this->lineService->handleMessage($event['replyToken'], $event['message']['text']);
            }
        }

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * 處理follow事件
     */
    private function handleFollowEvent(array $event): void
    {
        $replyToken = $event['replyToken'];

        $welcomeMessage = "歡迎加入我們的LINE官方帳號！";
        $this->lineService->replyWithMenu($replyToken, $welcomeMessage);
    }
}

