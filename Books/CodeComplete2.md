# Code Complete 2
 
### 서문

~~~

1. 프로젝트 관리와 요구사항, 설계, 테스트 방법을 분석하고 토론하는 데에 시간을 투자하게 되면서 코드 구현은 관심에서 멀어졌다. 그러나, 코드 구현이 소프트웨어 개발 활동에서 비중이 제일 크고 반드시 필요하며 제일 중요하다.

~~~

## 1부 : 기초 확립

### 1장 : 소프트웨어 구현으로의 초대

~~~

1. 코드 구현(작성)의 단계 : 문제 정의, 요구사항 개발, 구현 계획 수립, 소프트웨어 아키텍쳐 또는 고급 수준 설계, 상세 설계, 코드 작성 및 디버깅, 단위 테스트, 통합 테스트, 통합, 시스템 테스트, 유지보수

~~~

### 2장 : 소프트웨어 개발의 이해를 돕기 위한 비유

~~~

1. 문제를 해결하는 방법에는 2가지가 있다. 알고리즘과 발견적 학습. 두 방법에 차이는 해결책에 대한 직접성의 정도다. 알고리즘은 직접 단계별 방법을 알려주지만 발견적 학습은 방법을 찾는 방법을 알려주거나 적어도 어디서 답을 찾을 수 있는지 알려준다. 소프트웨어에서 발견적 학습인 비유를 어떻게 사용할 것인가? 프로그래밍 문제와 프로세스를 이해하고 프로그래밍 활동에 대해 생각하고 더 나은 작업 수행 방법을 생각해내는 데 도움을 받아라. 즉, 비유는 소프트웨어 개발 프로세스를 이미 알고 있는 다른 활동과 관련 지음으로써 그것을 이해하는 데 도움을 준다.

~~~

### 3장 : 준비는 철저하게: 선행 조건

~~~

1. 구현을 준비할 때 가장 중요한 목표는 위험을 줄이는 것이다. 구현 선행 조건은 문제 정의, 요구사항 개발, 아키텍쳐 설계 단계로 이루어진다. 
 
2. 프로젝트 종류가 순차적으로 진행하느냐, 반복적으로 진행하느냐에 따라 구현 선행 조건에 영향을 끼친다. 예를 들어, 얼마나 구현 선행 조건에 시간을 쏟아야 하는가.

3. 각각의 구현 선행 조건 단계가 잘 이루어지지 않으면 시간이나 금전적인 비용이 더 들게 되므로 제대로 이루어져야한다.

~~~

### 4장 : 구현 시 결정해야할 핵심 사항

~~~

1. 구현은 반드시 아키텍처와 일관성을 유지해야 하며 내부적으로도 일관성을 유지해야 한다. 예를 들어, 변수와 클래스, 루틴 이름들이나 가이드라인 등.

2. 모든 프로그래밍 언어에는 장단점이 있고 사용하는 언어의 장단점을 알아야한다.

3. 사용하는 프로그래밍 방법이 언어를 사용하기 위한 것인지 아니면 언어에 의해서 제어 당하고 있는 지를 스스로 물어보라. 언어에 의한 프로그래밍이 아닌 언어를 활용한 프로그래밍이 중요하다는 점을 명심해라.

~~~

## 2부 : 고품질 코드 작성

### 5장 : 구현 설계

~~~

1. 복잡한 관리의 중요성 : 한번에 한부분을 집중할 수 있는 프로그램을 구성하도록 노력하라.

2. 바람직한 설계의 특징 : 

~~~