# How to use GAS

## Missions

1. 템플릿 한 로우에 데이터 여러가지를 채웁니다.

2. 템플릿 파일을 복사한후, 모든 시트에 데이터들을 채우고 데이터 입력이 없는 시트는 숨깁니다.

3. 2차 미션 피드백 반영 및 수정한 후, 한영 번역기 customFunction 만들고, 마지막으로 pdf 파일을 만듭니다.

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
## Tips

* 바로 스크립트를 만드는 것과 템플릿에서 스크립트 편집기로 스크립트를 만드는 것의 차이점은?
  + 후자를 이용하면 cumtomFunction를 이용할 수 있습니다.

## Useful Codes

>    // dev: andrewroberts.net

    // Replace this with ID of your template document.
    var TEMPLATE_ID = ''

    // var TEMPLATE_ID = '1wtGEp27HNEVwImeh2as7bRNw-tO4HkwPGcAsTrSNTPc' // Demo template
    // Demo script - http://bit.ly/createPDF
 
    // You can specify a name for the new PDF file here, or leave empty to use the 
    // name of the template.
    var PDF_FILE_NAME = ''

    /**
     * Eventhandler for spreadsheet opening - add a menu.
     */

    function onOpen() {

      SpreadsheetApp
        .getUi()
        .createMenu('Create PDF')
        .addItem('Create PDF', 'createPdf')
        .addToUi()
    
    } // onOpen()

    /**  
     * Take the fields from the active row in the active sheet
     * and, using a Google Doc template, create a PDF doc with these
     * fields replacing the keys in the template. The keys are identified
     * by having a % either side, e.g. %Name%.
     *
     * @return {Object} the completed PDF file
     */

    function createPdf() {

      if (TEMPLATE_ID === '') {
    
        SpreadsheetApp.getUi().alert('TEMPLATE_ID needs to be defined in code.gs')
        return
      }

      // Set up the docs and the spreadsheet access
  
      var copyFile = DriveApp.getFileById(TEMPLATE_ID).makeCopy(),
          copyId = copyFile.getId(),
          copyDoc = DocumentApp.openById(copyId),
          copyBody = copyDoc.getActiveSection(),
          activeSheet = SpreadsheetApp.getActiveSheet(),
          numberOfColumns = activeSheet.getLastColumn(),
          activeRowIndex = activeSheet.getActiveRange().getRowIndex(),
          activeRow = activeSheet.getRange(activeRowIndex, 1, 1, numberOfColumns).getValues(),
          headerRow = activeSheet.getRange(1, 1, 1, numberOfColumns).getValues(),
          columnIndex = 0
 
      // Replace the keys with the spreadsheet values
 
      for (;columnIndex < headerRow[0].length; columnIndex++) {
    
        copyBody.replaceText('%' + headerRow[0][columnIndex] + '%', 
                              activeRow[0][columnIndex])                         
      }
  
      // Create the PDF file, rename it if required and delete the doc copy
    
      copyDoc.saveAndClose()

      var newFile = DriveApp.createFile(copyFile.getAs('application/pdf'))  

      if (PDF_FILE_NAME !== '') {
  
        newFile.setName(PDF_FILE_NAME)
      } 
  
      copyFile.setTrashed(true)
  
      SpreadsheetApp.getUi().alert('New PDF file created in the root of your Google Drive')
  
    } // createPdf()
