# Git Sub-split Test

Git의 Subsplit 플러그인을 이용해서 수퍼 프로젝트를 서브 프로젝트로 분리할 수 있는지 검토하기 위한 프로젝트다.

## 결론

> 가능

-   Git subsplit 플러그인은 빌드 담당자만 설치하면 될 것으로 사료된다.
-   배포 행위라 할 수 있으므로 CI에서 Trigger하지 말고, 수동으로 실행하는 것이 좋다고 판단된다.

## 실험 코드 테스트 방법

테스트 프로젝트에서는 수퍼 프로젝트(`.`)에 `git@192.168.88.211:appkr/subsplit-test.git` 원격 저장소에 연결되어 있다고 가정한다. 그리고 서브 프로젝트(`./Animal`)는 `git@192.168.88.211:appkr/subsplit-test.git` 원격 저장소로 배포한다. 서브 프로젝트 저장소는 빈 저장소여도 무관하다.

서브 프로젝트(`./Animal`)

Subsplit 플러그인을 설치한다.

```sh
$ git clone git@github.com:dflydev/git-subsplit.git
$ bash git-subsplit/install.sh
$ git subsplit
# usage: git subsplit init    url
# ...
```

저장소를 복제한다.

```sh
$ git clone git@192.168.88.211:appkr/subsplit-test.git
```

[OPTIONAL] 코드가 정상 작동하는지 확인한다.

```sh
$ cd subsplit-test
~/subsplit-test $ composer install
~/subsplit-test $ php index.php
# Animal\Zebra eats wild plants
# Animal\Bear eats fishes
```

배포한다

```
~/subsplit-test $ bash build/split.sh
```

## 적용 방법

1.  수퍼 프로젝트를 생성한다. 원격 저장소는 이미 연결되어 있다고 가정한다.

2.  서브 프로젝트로 분리할 프로젝트들을 식별한다.

3.  `build/split.sh` 파일을 작성한다.

    ```sh
    1. #! /usr/bin/env bash
    2. 
    3. git subsplit init git@github.com:appkr/subsplit-test.git
    4. git subsplit publish --heads="master" 로컬_디렉터리_경로:원격_저장소_주소
    5. rm -rf .subsplit/
    ```
    
    4번 라인을 참고해서 만들고 싶은 서브 프로젝트 만큼 명령을 추가한다.
    
4.  서브 프로젝트를 받아 줄 원격 저장소를 만든다.

5.  `bulid/split.sh` 명령을 수행한다.

