# Example of a bug with `UuidGenerator`

This repository contains an example of a bug with `UuidGenerator` from `symfony/doctrine-bridge`.

## How to reproduce

1. Run docker containers:

```bash
docker-compose up -d
```

2. Install dependencies:

```bash
docker-compose exec php composer install
```

3. Run migrations:

```bash
docker-compose exec php bin/console doctrine:migrations:migrate
```

4. Run tests

```bash
docker-compose exec php bin/phpunit
```
