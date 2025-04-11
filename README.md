# 请求示例

# 使用方法
```php
require_once __DIR__ . "/vendor/autoload.php";

use Lop\LopOpensdkPhp\Filters\ErrorResponseFilter;
use Lop\LopOpensdkPhp\Filters\IsvFilter;
use Lop\LopOpensdkPhp\Filters\LoggerFilter;
use Lop\LopOpensdkPhp\Options;
use Lop\LopOpensdkPhp\Support\DefaultClient;
use Lop\LopOpensdkPhp\Support\GenericRequest;

# 生产环境: https://api.jdl.com
$client = new DefaultClient("{BASE_URI}");

$isvFilter = new IsvFilter("{APP_KEY}", "{APP_SECRET}", "{ACCESS_TOKEN}");
# STDOUT是PHP内置常量，表示输出到标准输出（控制台）
$loggerFilter = new LoggerFilter(STDOUT);
$errorResponseFilter = new ErrorResponseFilter();

$request = new GenericRequest();
$request->setDomain("{DOMAIN}");//对接方案的编码，应用订购对接方案后可在订阅记录查看
$request->setPath("{PATH}");//api的path，可在API文档查看
$request->setMethod("POST");//只支持POST
# 序列化后的JSON字符串
$request->setBody("{BODY}");

# 为请求添加ISV模式过滤器，自动根据算法计算开放平台鉴权及签名信息
$request->addFilter($isvFilter);
# 为请求添加日志过滤器，日志将会输出到STDOUT，建议仅在测试时使用
$request->addFilter($loggerFilter);
# 为请求添加错误响应解析过滤器，如果不添加需要手动解析错误响应
$request->addFilter($errorResponseFilter);

$options = new Options();

$options->setAlgorithm(Options::MD5_SALT);
#$options->setAlgorithm(Options::HMAC_MD5);
#$options->setAlgorithm(Options::HMAC_SHA1);
#$options->setAlgorithm(Options::HMAC_SHA256);
#$options->setAlgorithm(Options::HMAC_SHA512);

$response = $client->execute($request, $options);
echo $response->getBody();
```
