# Test currency 0.0.1
Test library for currency calculations.

The purpose of this simple code is only demonstration of my coding skill. And it's not completed yet.

## Usage

```
$c = new Calculator('AED', 'USD');
$result = $c->convert(100);
```

## ToDo
- add a mock object for convert request instead of comparision in the OpenExchangeLoader::getConvertValue()
- add more sources for exchange rates information.
- describe configuration of the calculator.
- do refactoring.
- add build and styles checks.
- write documentation