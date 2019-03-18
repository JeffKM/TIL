## TIL history

~~~

git clone https://github.com/lee3945/TIL.git
cd TiL/
git status
vi README.md
git add README.md
git commit -> 이름짓기
git config
git config --global core.editor vim -> 6번문제해결
git remote -v
git push -u origin master -> 마스터 브랜치에 푸쉬
git l -> git log 간단히
git checkout -b 브랜치 이름
mkdir development
git branch
touch dummy.php
rm -rf development/
vi code-complete-2.md
git checkout master
git branch -d 브랜치 이름 < git branch -D 브랜치

~~~

## Simcity histroy

~~~

git clone 심시티주소
git checkout -b fix-my-home
vi mycity -> 수정
git fetch upstream
git checkout master
git branch
git branch -D fix-my-home
git pull --rebase upstream master
git l 
git branch fix-my-home
git l
git checkout fix-my-home
git branch
ls
vi mycity
git status
git commit
git l
git branch
git checkout master
git branch
git push origin master
git branch
git checkout fix-my-home
git push origin fix-my-home
git fetch upstream
git remote -v
git checkout master
git branch
git pull --rebase upstream master
git push origin master
git merge 브랜치이름
git branch -D 브랜치이름

~~~


## Simcity 과정

1. origin : 내가 포크 뜬 repository , upstream : 다른 사람들이 공유하는 repositary, local : 내컴퓨터
2. 큰 과정 2가지 : 각각의 repo에는 master와 branch가 있는데 master들을 모두 최신화하는게 첫번째, 수정하고 다시 최신화 시키는게 두번째 일이다.
3. 위에 origin과 upstream의 상태 확인을 git remote -v로 확인하자.
4-1. 2번의 첫번째 과정을 위하여 첫번째로 내 로컬이 upstream과 상태가 같게 만들자. -> git fetch upstream(repo이름) : git DB 최신화 -> git pull --rebase upstream master
4-2. 내 로컬이 origin master와 상태가 같게 만들자. -> git push orgin master
4-3. 모든 repo 및 로컬의 master가 최신 HEAD를 가리키는지 확인하자. -> git l\
5-1. 2번의 두번째 수정 과정을 위하여 로컬의 branch를 생성하자. -> git branch 브랜치 이름
5-2. branch로 HEAD를 옮기자 -> git checkout 브랜치 이름
5-3. 진짜 수정하자. -> vi 파일 이름 후 수정 후 :wq or :x
5-4. 수정 파일이 git 추적되고 있는지 확인 -> git status
5-5. 원하는 파일 추적 -> git add [작업 파일 경로]
5-6. 추적을 한 애만 commit 가능하고 commit하자 -> git commit
5-7. origin에 내가 만든 branch를 push 하자 -> git push origin 브랜치 이름
5-8. github 홈페이지에 가서 origin이 잘됐는지 확인하자.
5-9. pull-request 요청하자. -> github origin repository에서 pull-request
5-10. pull-request approve 해주면 끝, 위 과정을 반복한다.



## git commit message 좋게 작성하는 방법



1. 제목과 본문을 한 줄 띄워 분리하기
2. 제목은 영문 기준 50자 이내로
3. 제목 첫글자를 대문자로
4. 제목 끝에 . 금지
5. 제목은 명령조로
6. Github - 제목(이나 본문)에 이슈 번호 붙이기
7. 본문은 영문 기준 72자마다 줄 바꾸기
8. 본문은 어떻게보다 무엇을, 왜에 맞춰 작성하기



## git study



* merge: 실묶기 2.rebase: 실하나버리기 3.fast forward: 헤드만 옮기기
* git cherry-pick 브랜치이름 : commit 1개 rebase
* commit : project 전체의snapshot
* git pull --rebase: 다른사람들 한거 merge로 가져오고 자신껄 최신으로 놓음
* commit 하나하나가 의미나 기능을 갖도록 하라.



## git study2

* commit : snapshot
* commit hash -> *부모 commit hash, *project 전체의 hash, commit message, metadata(몇시,몇분,누가 만듦)
* 부모 commit 1개 :  그냥 commit, 2개 : merge commit
* 프로젝트 전체의 해쉬 값 만들기 : 하위 파일들의 해쉬값들을 모으고 이 과정을 반복하여 만듦
* untracked, tracked, staged : commit 들의 상태
* add하는 이유 -> add한 애들만 해쉬값 계산(바뀐애들만) -> staged가 되어 git DB에 파일로 저장(insert) -> git DB에 어떻게 들어가느냐 - key : hash, value :  파일명
* head : 눈, 내가 보고 있는 commit, 열어보면 내가 보고 있는 commit hash값 들어있음, 브랜치와 다른점 : 브랜치는 이름있는 헤드
* checkout : 브랜치 헤드를 옮김, reset : 이름 없는 헤드를 옮김 ex) git checkout master, git reset --hard c: master head $ no name head가 c를 보게됨
* merge된 뒤 헤드가 옮겨감, rebase : 구슬들을 다시 꿰어놀 떄 구슬들의 해쉬 값이 바뀌고 원래 구슬들은 존재하지만 잊혀짐
* git cherrypick 해쉬값들 : 1개씩만 rebase
* github vim에 이미지 넣기 : command + control + space

## git 최신화하기

1. git ls -al 로 현재 위치에 .git 이 있는지 확인
2. git fetch
3. git branch
4. git pull
