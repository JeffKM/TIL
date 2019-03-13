# How to use GAS

## Missions

1. 템플릿 한 로우에 데이터 여러가지 채우기

2. 템플릿 파일을 복사한후, 모든 시트에 데이터들을 채우고 데이터 입력이 없는 시트는 숨기기

## Grammers

* ___SpreadsheetApp.openByID(ID)___
   + 스프레드시트의 ID로 스프레트시트를 가져옵니다.

* ___DriveApp.getFolderById(ID)___
   + 폴더의 아이디로 폴더를 가져옵니다.

* ___DriveApp.getFileById(템플릿변수명.getId()).makeCopy(folder name);___
   + 스프레드시트 파일을 폴더 안에 복사합니다.

* ___스프레드시트 이름.getSheetByName(시트 이름)___
   + 스프레드시트의 시트 이름에 맞는 시트를 가져옵니다.

* ___시트이름.getRange(row, column, numrow, numcolumn)___
   + 시트의 범위를 잡습니다.

* ___설정된 범위변수명.setValues(값들의 이차원배열)___
   + 정해진 범위에 값들을 집어 넣습니다.

* ___시트이름.hideSheet();___
   + 시트를 숨깁니다.
 
