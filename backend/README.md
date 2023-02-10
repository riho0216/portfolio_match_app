### アプリケーションの名前
Wear-Rental-App

### アプリケーションの概要
訪日外国人旅行客向けのアウターレンタルサービス

### 制作背景
前職が旅行業だったことからインバウンドに関しても興味を持っていた。街中でも多く外国人観光客を見かけるが、温暖な気候で暮らす人々（台湾、タイ、フィリピン、インドネシア、マレーシアなど）が冬の日本観光に訪れている時に購入したアウターは自国に持って帰っているのだろうか、と疑問がわいた。アウターがレンタルできるサービスがあれば、荷物が減り秋～冬の日本観光でお土産などもっとスーツケースが詰められるし、地球環境に優しい取り組みになるのではないかと考えた。

### 使用技術
* HTML
* CSS
* PHP（Laravel）
* MySQL

### 機能一覧
* 登録、ログイン機能
* 登録者へのメール機能
* 商品へのコメント機能
* いいねのカウント機能
* プロフィール機能

* [admin / 店側]
  * 商品アップ機能
  * 商品編集、商品消去機能
  * ユーザー、商品データ管理機能（ユーザーデータ一覧/商品一覧/タグ追加/ジェンダー追加）

* [user / 客側]
  * カート機能
  * いいねした商品を一覧できる機能
  * 商品個数・レンタル期間での計算機能、返却日計算機能

### こだわった部分
* 商品を多く見れるよう３列配置にした
* カート機能では商品個数×レンタル期間で合計金額が計算できるようにし、返却日も計算して見えるようにした。
* adminではタグの数や投稿データをわかりやすく一覧できるようにした。


### 苦労した部分
カート内の計算式。ループを使い商品ID等のデータを取り出し、ループを使って計算するところが一番時間を使った。



### 今後追加したい機能（現段階でできてない箇所）
計算後の支払い機能
