# Overview
🔊 [공공데이터포털](https://data.go.kr)에서 제공하는 `서울특별시 버스 도착정보 조회` API를 사용하였습니다.

## Usage
1. 공공데이터포털 회원가입을 한다.
2. 로그인 후 [서울특별시 버스도착정보조회 서비스](https://www.data.go.kr/data/15000314/openapi.do)에서 활용신청을 한다.
3. 마이페이지에서 해당 서비스의 `서비스 키` 를 확인하여 세팅한다.
```php
private $serviceKey = 'your-service-key';
```
4. 해당 정류장의 ID 값을 확인하여 인스턴스 생성
```php
<?php
/**
 * @param int 정류장 ID
 * https://www.gbis.go.kr/ (경기버스정보)
 */
$bus  = new busArrInfo($stationId);
```

자세한 내용은 해당 포털의 레퍼런스를 참고하세요. ✔

## License
MIT
