# Ejemplo de Parser

Este repositorio contiene un ejemplo de implementación de un parser en PHP utilizando Composer. El objetivo es demostrar cómo construir y utilizar parsers personalizados para procesar gramáticas específicas, como operaciones matemáticas simples (por ejemplo, "suma 1 y 3").

## Características

- Código simple y fácil de entender.
- Implementación en PHP con Composer.
- Explicaciones paso a paso.

## 🚀 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente:

- **PHP 8.1 o superior** (`php -v`)
- **Composer 2.5+** (`composer --version`)
- **Git** (opcional, para clonar el repositorio)

### 📥 Instalación en Windows

1. Descargar PHP desde [windows.php.net](https://windows.php.net/download/).
2. Instalar Composer desde [getcomposer.org](https://getcomposer.org/download/).
3. (Opcional) Instalar Git desde [git-scm.com](https://git-scm.com/).

## Cómo Empezar

1. Clona el repositorio:
    ```bash
    git clone https://github.com/your-username/parser-example.git
    cd parser-example
    ```

2. Instala las dependencias con Composer:
    ```bash
    composer install
    ```

3. Ejecuta el script principal para probar el parser:
    ```bash
    php src/main.php
    ```

## Cómo Ejecutar los Tests

1. Asegúrate de haber instalado las dependencias con Composer.
2. Ejecuta los tests con PHPUnit:
    ```bash
    composer test
    ```

## Cómo Agregar un Nuevo Test

1. Abre el archivo de tests en el directorio `tests`. Por ejemplo, `tests/ParserTest.php`.
2. Agrega un nuevo método de test. Por ejemplo:
    ```php
    public function testNewFeature(): void
    {
        $input = "suma 1 y 3";
        $expectedOutput = 4;
        $result = Parser::parse($input);
        $this->assertEquals($expectedOutput, $result);
    }
    ```
3. Guarda los cambios y ejecuta los tests para asegurarte de que todo funciona correctamente.

## Contribuir

¡Las contribuciones son bienvenidas! Sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad o corrección de errores.
3. Envía un pull request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
