import crawler
title_list, date_list, url_list = crawler.ce_notice_crawler("https://cms.pknu.ac.kr/ced/main.do")
def ce_notice():
    global title_list, date_list, url_list
    data = {
  "version": "2.0",
  "template": {
    "outputs": [
      {
        "listCard": {
          "header": {
            "title": "학과 공지사항입니다."
          },
          "items": [
            {
              "title": title_list[0],
              "description": date_list[0],
              
              "link": {
                "web": url_list[0]
              }
            },
            {
              "title": title_list[1],
              "description": date_list[1],
              
              "link": {
                "web": url_list[1]
              }
            },
            {
              "title": title_list[2],
              "description": date_list[2],
              
              "link": {
                "web": url_list[2]
              }
            },
            {
              "title": title_list[3],
              "description": date_list[3],
              
              "link": {
                "web": url_list[3]
              }
            },
            {
              "title": title_list[4],
              "description": date_list[4],
              
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