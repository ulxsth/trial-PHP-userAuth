# PHPでユーザー登録作成テスト
## 注意
- DBはsqlite3で作ってる（本番環境では直そうね）
    - sqlite使うならphp.iniの設定変えようね
- IDはAUTO_INCREMENT採用（セキュリティ気にするならロジック組もうね）

## いろいろ
- `empty()` と `isset()` の違い
    - issetの真逆を返すのがempty！ではないです
    - 詳しくは[これ](https://qiita.com/shinichi-takii/items/00aed26f96cf6bb3fe62)
    - 「空かどうか」を見るだけなら反転しなくていい`empty()`が素直です

- `password_hash()`と`password_verify()`
    - パスワードを平文で扱うのはとてもきけん
    - なので、登録時は`password_hash()`でハッシュ化、比較は`password_verify()`でやろうね

- session
    - 

## 参照
- コードはほとんどCopilotくん
- [PHPで会員登録＆ログイン機能を作成してみた](https://wagtechblog.com/programing/php-register-login.html)

