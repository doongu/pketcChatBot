import crawler
title_list, date_list, url_list = crawler.ce_notice_crowler(["https://cms.pknu.ac.kr/ced/main.do","컴퓨터공학과"])
def ce_notice():
    global title_list, date_list, url_list
    data = {
  "version": "2.0",
  "template": {
    "outputs": [
      {
        "listCard": {
          "header": {
            "title": "카카오 i 디벨로퍼스를 소개합니다"
          },
          "items": [
            {
              "title": title_list[0],
              "description": date_list[0],
              "imageUrl": "http://k.kakaocdn.net/dn/APR96/btqqH7zLanY/kD5mIPX7TdD2NAxgP29cC0/1x1.jpg",
              "link": {
                "web": url_list[0]
              }
            },
            {
              "title": title_list[1],
              "description": date_list[1],
              "imageUrl": "http://k.kakaocdn.net/dn/N4Epz/btqqHCfF5II/a3kMRckYml1NLPEo7nqTmK/1x1.jpg",
              "link": {
                "web": url_list[1]
              }
            },
            {
              "title": title_list[2],
              "description": date_list[2],
              "imageUrl": "http://k.kakaocdn.net/dn/bE8AKO/btqqFHI6vDQ/mWZGNbLIOlTv3oVF1gzXKK/1x1.jpg",
              "link": {
                "web": url_list[2]
              }
            },
            {
              "title": title_list[3],
              "description": date_list[3],
              "imageUrl": "http://k.kakaocdn.net/dn/bE8AKO/btqqFHI6vDQ/mWZGNbLIOlTv3oVF1gzXKK/1x1.jpg",
              "link": {
                "web": url_list[3]
              }
            },
            {
              "title": title_list[4],
              "description": date_list[4],
              "imageUrl": "http://k.kakaocdn.net/dn/bE8AKO/btqqFHI6vDQ/mWZGNbLIOlTv3oVF1gzXKK/1x1.jpg",
              "link": {
                "web": url_list[4]
              }
            }
          ],
          "buttons": [
            {
              "label": "학과 홈페이지",
              "action": "webLink",
              "webLinkUrl": "https://cms.pknu.ac.kr/ced/main.do"
            }
          ]
        }
      }
    ]
  }
}
    return data