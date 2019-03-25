# How to use GAS

## Missions

1. 템플릿 한 로우에 데이터 여러가지를 채웁니다.

2. 템플릿 파일을 복사한후, 모든 시트에 데이터들을 채우고 데이터 입력이 없는 시트는 숨깁니다.

3. 2차 미션 피드백 반영 및 수정한 후, 한영 번역기 customFunction 만들고, 마지막으로 pdf 파일을 만듭니다.

4. 2차 미션 피드백을 다시 수정한 뒤, customfunction에서 한글에서 영어로 번역되지 않는 문제를 수정하고, pdf 파일이 생성되지 않는 문제를 해결합니다.

5. 코드 리펙토링을 한 뒤 4차 미션 피드백을 수정하고, 데이터 형식을 json 형식으로 수정하고 로우 수를 반응형으로 늘리게 합니다.

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

* ___LanguageApp.translate(번역문자열, 번역 대상 언어, 번역 목표 언어)___
   + 다른 언어로 번역해줍니다.

* ___DriveApp.createFile(pdf로 만들 파일 변수명.getAs('application/pdf'));___
   + pdf 파일을 만듭니다.

* ___sheet.appendRow([넣을 내용의 문자열]);___
   + 넣을 내용을 포함한 행을 마지막 행에 추가합니다.

* ___sheet.getRange(범위1).moveTo(sheet.getRange(범위2));___
   + 범위1의 행렬들을 범위2의 행렬들로 이동합니다.

* ___source_range.copyTo(target_range);___
   + 소스 범위의 행렬을 타겟 범위의 행렬에 복사합니다.
## Tips

* 바로 스크립트를 만드는 것과 템플릿에서 스크립트 편집기로 스크립트를 만드는 것의 차이점은?
  + 후자를 이용하면 cumtomFunction를 이용할 수 있습니다.

## Useful Codes

* 파일을 폴더로 옮깁니다.
   +     function moveFiles(sourceFileId, targetFolderId) {
           var file = DriveApp.getFileById(sourceFileId);
           file.getParents().next().removeFile(file);
           DriveApp.getFolderById(targetFolderId).addFile(file);
         }

