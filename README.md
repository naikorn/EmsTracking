# Thailand Ems Tracking
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<p>ขั้นตอนแรกให้ดำเนินการสมัครเป็นสมาชิกกับทางไปรษณย์ไทยก่อน <a href="https://track.thailandpost.co.th/login">ไปรษณีย์ไทย</a> จากนั้นทำการสร้างรหัส token แล้วนำมาตั้งค่าไว้ที่ไฟล์ env โดยกำหนดตัวแปรชื่อว่า TOKEN_EMS</p>

```php
TOKEN_EMS={token}
```

<p>ตัวอย่างการใช้งาน</p>

```php
use Thavirat\EmsTracking\EmsTracking;
...

public function callTracking(){
  $barcode = [
    "EY145587896TH"
  ];
  $tracking = new EmsTracking();
  return $tracking->getItems($barcode);
}

```
<p>ข้อมูลที่ได้กลับมา</p>

```php

  "EY145587896TH"=>[
    {
      "barcode": "EY145587896TH",
      "status": "103",
      "status_description": "รับฝาก",
      "status_date": "06/01/2563 12:33:31+07:00",
      "location": "แก้งคร้อ",
      "postcode": "36150",
      "delivery_status": null,
      "delivery_description": null,
      "delivery_datetime": null,
      "receiver_name": null,
      "signature": null
    },
    {
      "barcode": "EY145587896TH",
      "status": "201",
      "status_description": "อยู่ระหว่างการขนส่ง",
      "status_date": "06/01/2563 13:28:07+07:00",
      "location": "แก้งคร้อ",
      "postcode": "36150",
      "delivery_status": null,
      "delivery_description": null,
      "delivery_datetime": null,
      "receiver_name": null,
      "signature": null
    },
    {
      "barcode": "EY145587896TH",
      "status": "201",
      "status_description": "อยู่ระหว่างการขนส่ง",
      "status_date": "06/01/2563 20:31:00+07:00",
      "location": "ศป.นครราชสีมา",
      "postcode": "30010",
      "delivery_status": null,
      "delivery_description": null,
      "delivery_datetime": null,
      "receiver_name": null,
      "signature": null
    },
    {
      "barcode": "EY145587896TH",
      "status": "301",
      "status_description": "อยู่ระหว่างการนำจ่าย",
      "status_date": "07/01/2563 13:12:27+07:00",
      "location": "บางรัก",
      "postcode": "10500",
      "delivery_status": null,
      "delivery_description": null,
      "delivery_datetime": null,
      "receiver_name": null,
      "signature": null
    },
    {
      "barcode": "EY145587896TH",
      "status": "501",
      "status_description": "นำจ่ายสำเร็จ",
      "status_date": "07/01/2563 13:42:50+07:00",
      "location": "บางรัก",
      "postcode": "10500",
      "delivery_status": "S",
      "delivery_description": "ผู้รับได้รับสิ่งของเรียบร้อยแล้ว",
      "delivery_datetime": "07/01/2563 13:42:50+07:00",
      "receiver_name": "อลิษา/ลูกจ้าง",
      "signature": "https://trackimage.thailandpost.co.th/f/signature/QDI3NDcwYjVzMGx1VDMz/QGI1c0VJMGx1VDMx/QGI1czBsVEh1VDM0/QGI1czBsdTUwODZUMzI="
    }
  ]

```
