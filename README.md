# Easegex
## How to Use
### Match
```
use Msossai91\Easegex\Easegex
...
$pattern = '/exemple/g';
$easegex = new Easegex();
$easegex->setPattern($pattern);
$easegex->setSubject('exemple');
$match = $easegex->match();
```
Or
```
use Msossai91\Easegex\Easegex
...
$pattern = '/exemple/g';
$match = (new Easegex())
    ->setPattern($pattern)
    ->setSubject('exemple')
    ->match();
```
Or
```
use Msossai91\Easegex\Easegex
...
$pattern = '/exemple/g';
$match = (new Easegex($pattern, 'exemple'))->match();
```
Or
```
use Msossai91\Easegex\Easegex
...
$pattern = '/exemple/g';
$match = Easegex::regex($pattern, 'exemple')->match();
```

### Match All
To use match all just change: `match()` to `matchAll()`

### Flags
Can be used by using `setFlag(PREG_OFFSET_CAPTURE)` or using the function that already fills the flag:
- `setFlagOffsetCapture()`
- `setFlagUnmatchedAsNull()`
- `setFlagPatternOrder()`
- `setFlagSetOrder()`

You can use the flag in constructor:
`Easegex::regex($pattern, $subject, PREG_OFFSET_CAPTURE)->match()`
or
`(new Easegex($pattern, $subject, PREG_OFFSET_CAPTURE))->match()`

### Offset
Can be defined by `setOffset(0)` or in constructor:
`Easegex::regex($pattern, $subject, $flag, 1)->match()`
or
`(new Easegex($pattern, $subject, $flag, 1))->match()`
