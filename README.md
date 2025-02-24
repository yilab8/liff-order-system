# LINE Bot 點餐系統

這是一個基於 LINE Bot 的點餐系統，允許用戶通過 LINE 進行點餐操作，並在前端顯示訂單狀態。

## 功能

- **菜單管理**：用戶可以查詢菜單。
- **購物車管理**：用戶可以添加、查看和清空購物車。
- **訂單管理**：用戶可以創建訂單並查看訂單狀態。

## 環境設置

1. 複製 `.env.example` 並重命名為 `.env`，然後配置以下參數：
   ```
   LINE_BOT_CHANNEL_ACCESS_TOKEN=your_line_bot_channel_access_token_here
   LINE_BOT_CHANNEL_SECRET=your_line_bot_channel_secret_here
   ```

2. 安裝依賴：
   ```
   composer install
   ```

3. 生成應用密鑰：
   ```
   php artisan key:generate
   ```

4. 遷移資料庫：
   ```
   php artisan migrate
   ```

## 使用說明

- 啟動開發伺服器：
  ```
  php artisan serve
  ```

- 設定 LINE Developers 平台上的 Webhook URL，指向 `/api/line/webhook`。

- 在 LINE 中與 Bot 互動，使用以下指令：
  - `menu`：查詢菜單
  - `add to cart`：添加商品到購物車
  - `view cart`：查看購物車
  - `clear cart`：清空購物車
  - `order`：創建訂單

## 測試

運行測試：
```
php artisan test
```

## 注意事項

- 確保 Redis 已安裝並正在運行，因為購物車功能依賴於 Redis。
- 本專案僅供學習和測試使用。
