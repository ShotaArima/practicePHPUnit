# practice-phpunit
このリポジトリは、PHPUnitについて理解するための練習である

## 参考文献
- [【初心者向け】PHPUnitをとりあえず使ってみる方法](https://qiita.com/mako5656/items/8add0875ab10381b9012)

## PHPUnitとは
- PHP言語の単体テストを行うためのフレームワーク
- 変更した箇所で要件を満たしていて、既存の機能に影響がないかを毎回確認することを自動化できる

###流れ
1. PHPUnitをComposerで入れる
2. テストコードを書く
3. コード実行で利用

### 今回の動作環境
- PHP : v8.3.9
- composer : v2.7.7 
- PHPUnit : ^10.5

## 準備
- プロジェクト作成のコマンド
```bash
$ composer init
```

- 設定
```bash
Package name (<vendor>/<name>) [makoto/phpunit-getting-started]: app/phpunit
Description []:
Author [名前 <メールアドレス>, n to skip]:
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []: prpject
License []:

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no
Add PSR-4 autoload mapping? Maps namespace "App\Phpunit" to the entered relative path. [src/, n to skip]:
```

- `config.platform`の設定
```bash
$ composer config platform.php  8.1.13
```
これにより、`composer.json`に以下の内容が追加される
```json
    "config": {
        "platform": {
            "php": "8.1.13"
        }
    },
```
- PHPUnitのインストール
```bash
$ composer require --dev phpunit/phpunit
```
これにより、`composer.json`に下記の内容が追加される
```json
    "require-dev": {
        "phpunit/phpunit": "^10.5"
    }
```

