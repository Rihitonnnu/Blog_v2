# docker-laravel

## クローン

```
git clone git@github.com:Rihitonnnu/Blog_v2.git
```

## プロジェクトセットアップ

### ビルドとコンテナ起動

```
docker compose up -d
```

### env ファイルコピー

```
$ cp .env.example .env
```

### コンテナに入る

```
docker compose exec blog bash
```

### Composer インストール

```
composer install
```

### 認証キー作成

```
php artisan key:generate
```

### マイグレーション、シーディング

```
php artisan migrate:fresh --seed
```

## テスト環境セットアップ

### キャッシュクリア

```
php artisan config:clear
```

### 認証キー作成

```
php artisan key:generate --env=testing
```

### db コンテナに入る

```
docker compose exec db-blog bash
```

### MySQL にログイン(pw は root)

```
mysql -u root -p
```

### テスト用のデータベース作成

```
create database docker_laravel_test;
```

### DB の権限設定(pw は docker)

```
grant all on docker_laravel_test.* to docker;
```

### マイグレート

```
php artisan migrate --env=testing
```

## Vite セットアップ

### npm インストール

```
npm install
```

### ビルド

```
#開発環境用
npm run dev

#本番環境用
npm run build
```
