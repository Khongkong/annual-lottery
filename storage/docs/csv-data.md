## 員工與獎品資料

員工名單與獎品名單以 `csv` 的檔案形式存放於 `storage/app/` 中。

在啟動時，會將檔案的資料匯入 `database/database.sqlite` 中。這個檔案裡也同時會紀錄得獎名單，在最後可將結果一併匯出。

### 員工名單

員工名單由 HR 提供，檔名為 `candidates.csv`。檔案內部結構為

```
部門代碼,部門名稱,員編,姓名,到職日期
```

### 獎品名單

獎品名單的檔名為 `awards.csv`。檔案內部結構為

```
獎項,現金,獎項數
```
