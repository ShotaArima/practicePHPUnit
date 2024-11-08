# practicePHPUnit

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

## ディレクトリ構造
```bash
.
├── src
│   └── Calculator.php
├── tests
│   └── CalculatorTest.php
└── vendor
```
- src
  - 機能などを記述する
- tests
  - テストコードを記述する
- vendor
  - phpunitなどのものが色々入っている

## テストの実行
```bash
$  vendor/phpunit/phpunit/phpunit tests
PHPUnit 10.5.38 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.3.9

..                                                                  2 / 2 (100%)

Time: 00:00.002, Memory: 6.00 MB

OK (2 tests, 2 assertions)

```
..は成功の意味なので、これでうまくいっていることがわかる

### 間違いの場合
```php
    public function test_エラー()
    {
        $calculator = new Calculator();
        $this->assertSame(10, $calculator->add(10, 2));
        $this->assertSame(7, $calculator->sub(10, 2));
    }
```

結果
```bash
$  vendor/phpunit/phpunit/phpunit tests
PHPUnit 10.5.38 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.3.9

..F                                                                 3 / 3 (100%)

Time: 00:00.006, Memory: 8.00 MB

There was 1 failure:

1) App\Phpunit\CalculatorTest::test_エラー
Failed asserting that 12 is identical to 10.

/Users/shota.arima/tmp-phpunit/tests/CalculatorTest.php:23

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.

```

## 注意
- 最初テストがうまくいかなかった
- クラスが読み込まれないエラーだった
  - `composer.json`に以下の内容かどうかを確認し、更新するとうまくいった
  - `composer.json`
    ```json
    "autoload": {
        "psr-4": {
            "App\\Phpunit\\": "src/"
        }
    }
    ```
  - `composer.json`の更新
    ```bash
    composer dump-autoload   
    ```
  - 理由を調べる必要がある

# Unitテストの極意
- 1単位の振る舞いを確認すること
- 実行時間が短いこと
- 他のテストケースから隔離された状態で実行されること
