
# Design Patterns Practice (PHP up to 8.3)

## Description
This repository is designed for educational and experimental purposes.

## Table of Contents
- [Initial Configuration](#initial-configuration)
- [Unit Testing Instructions](#unit-testing-instructions)
- [Static Analysis](#static-analysis)
- [Docker Usage Guidelines](#docker-usage-guidelines)
- [Implemented Design Patterns](#implemented-design-patterns)

## Initial Configuration
1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```bash
   cd <repository-folder>
   ```

3. Install dependencies using Composer:
   ```bash
   composer install
   ```

4. Read .env.dist file and follow the rules.

## Unit Testing Instructions

Run the tests:
   ```bash
   ./vendor/bin/phpunit
   ```

For detailed output, use:
   ```bash
   ./vendor/bin/phpunit --verbose
   ```

## Static Analysis

Run PHPStan on the project files (level 0 is the least strict, 10 the most):
   ```bash
   ./vendor/bin/phpstan analyse  ./ --level 4
   ```

## Docker Usage Guidelines
The project can be containerized using Docker. Follow these steps to set up the environment:

1. Build the Docker image:
   ```bash
   docker build -t design_patterns_practice .
   ```

2. Run the container:
   ```bash
   docker run -d -it --name dpp design_patterns_practice
   ```

3. Enter the container:
   ```bash
   docker exec -it dpp /bin/sh
   ```

4. Run tests in the container:
   ```bash
   ./vendor/bin/phpunit
   ```

## Implemented Design Patterns

### Creational Patterns
- Abstract Factory
- Builder
- Prototype
- Singleton
- Property
- Factory method
- Simple Factory

### Structural Patterns
- Dependency Injection
- Facade
- Adapter (Wrapper)
- Composite
- Fluent Interface

### Behavioral Patterns
- Memento
- Null Object
- Observer
- Strategy (Policy)
- Visitor
- Command
- State

### Other
- Value Object
- Command Query Separation
- Lazy Loading
- DTO     

### :warning: Warning:
**You open "ExperimentalFolder" directory at your own risk.**