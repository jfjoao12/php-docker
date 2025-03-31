# Buildar

```
docker build -t phpproject .
```

# Rodar

```
docker run -p 4321:80 --rm -it  phpproject:latest
```

# Modo desenvolvimento:

```
docker compose build --no-cache && docker compose up -d
```
