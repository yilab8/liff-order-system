<?php

namespace App\Services;

use GuzzleHttp\Client;
use LINE\Clients\MessagingApi\Configuration;
use LINE\Clients\MessagingApi\Api\MessagingApiApi;
use LINE\Clients\MessagingApi\Model\ReplyMessageRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class LineService
{
    protected $messagingApi;

    public function __construct()
    {
        $channelToken = env('LINE_CHANNEL_ACCESS_TOKEN');
        $client = new Client();
        $config = new Configuration();
        $config->setAccessToken($channelToken);
        $this->messagingApi = new MessagingApiApi(
            client: $client,
            config: $config
        );
    }

    public function handleMessage($replyToken, $messageText)
    {
        if ($messageText === '菜單') {
            $this->reply($replyToken, 'menu');
        }
    }

    private function reply(string $replyToken, string $type, string $text = ''): void
    {
        try {
            $message = $type === 'menu' ? $this->createMenuMessage() : $this->createTextMessage($text);

            $request = new ReplyMessageRequest([
                'replyToken' => $replyToken,
                'messages' => [$message]
            ]);

            $this->messagingApi->replyMessage($request);
        } catch (Exception $e) {
            Log::error('LINE API 執行失敗', [
                'action' => '回覆訊息',
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'stack_trace' => $e->getTraceAsString()
            ]);
        }
    }

    private function createTextMessage(string $text): array
    {
        return [
            'type' => 'text',
            'text' => $text
        ];
    }

    private function createMenuMessage(): array
    {
        return [
            'type' => 'flex',
            'altText' => '這是菜單',
            'contents' => [
                'type' => 'bubble',
                'hero' => [
                    'type' => 'image',
                    'url' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
                    'size' => 'full',
                    'aspectRatio' => '20:13',
                    'aspectMode' => 'cover',
                ],
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'text',
                            'text' => '今日菜單',
                            'weight' => 'bold',
                            'size' => 'xl',
                        ],
                        [
                            'type' => 'text',
                            'text' => "1. 魚香肉絲\n2. 宮保雞丁\n3. 麻婆豆腐",
                            'wrap' => true,
                        ],
                    ],
                ],
            ]
        ];
    }
}
