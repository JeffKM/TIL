# How to use GAS

## Missions

1. 템플릿 한 로우에 데이터 여러가지를 채웁니다.

2. 템플릿 파일을 복사한후, 모든 시트에 데이터들을 채우고 데이터 입력이 없는 시트는 숨깁니다.

3. 2차 미션 피드백 반영 및 수정한 후, 한영 번역기 customFunction 만들고, 마지막으로 pdf 파일을 만듭니다.

4. 2차 미션 피드백을 다시 수정한 뒤, customfunction에서 한글에서 영어로 번역되지 않는 문제를 수정하고, pdf 파일이 생성되지 않는 문제를 해결합니다.

5. 코드 리펙토링을 한 뒤 4차 미션 피드백을 수정하고, 데이터 형식을 json 형식으로 수정하고 로우 수를 반응형으로 늘리게 합니다.

6. 웹 앱 배포 방법에 대해 공식 문서를 읽은 뒤, curl 데이터 json 파일을 생성하고, 요청 파라미터가 json 데이터 파일이고 응답 파라미터가 데이터가 채워진 스프레드시트 url을 리턴하는 함수를 만듭니다.

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

### GAS with CURL

* CURL이란?
  + Client Uniform Resource Locater : 다양한 통신 프로토콜을 이용하여 데이터를 전송하기 위한 라이브러리와 명령 줄 도구를 제공하는 컴퓨터 소프트웨어 프로젝트입니다.

* 서버 요청 방식 GET과 POST 차이점은?
  + GET은 가져오는 것이고 POST는 수행하는 것입니다. 이 개념만 잘 생각하고 있으면 상황에 따라서 어느정도 선택을 할 수 있습니다. 좀 자세히 설명하면 GET은 Select적인 성향을 가지고 있습니다. GET은 서버에서 어떤 데이터를 가져와서 보여준다거나 하는 용도이지 서버의 값이나 상태등을 바꾸지 않습니다. 게시판의 리스트라던지 글보기 기능 같은 것이 이에 해당하죠. 반면에 POST는 서버의 값이나 상태를 바꾸기 위해서 사용합니다. 글쓰기를 하면 글의 내용이 디비에 저장이 되고 수정을 하면 디비값이 수정이 되죠. 이럴 경우에 POST를 사용합니다. 

* Post 방식으로 JSON 파일을 처리하도록 요청하게 하는 명령어는?
  +    curl -d @파일명 -L -H 'Content-Type: application/json' 웹앱 URL
    - 위 명령어를 실행하면 파일을 e파라미터로 받는 doPost 함수를 실행합니다.
    - post 방식을 사용하면 데이터들이 e.parameter.data에 생성되지 않고 e.postData.contents에 생성됩니다.
## Useful Codes

* 파일을 폴더로 옮깁니다.
   +     function moveFiles(sourceFileId, targetFolderId) {
           var file = DriveApp.getFileById(sourceFileId);
           file.getParents().next().removeFile(file);
           DriveApp.getFolderById(targetFolderId).addFile(file);
         }

