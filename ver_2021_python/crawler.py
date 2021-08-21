# -*- coding: utf-8 -*-
from bs4 import BeautifulSoup
import requests
import urllib3

urllib3.disable_warnings() 

def ce_notice_crawler(url):
    select_url = url

    request = requests.get(select_url,verify=False)
    soup = BeautifulSoup(request.text, "html.parser")
    #find,find_all
    test = soup.find("div",{"class":"module-board"})
    tester = test.find_all("a")

    answer = test.text
    answer = answer.strip()
    answer = answer.split("\n")
    answer = answer[2:-1]

    title_list = []
    date_list = []
    url_list = []
    for a in range(5):
        title_list.append(answer[a][:-10])
        date_list.append(answer[a][-10:]) 
        url_list.append("https://cms.pknu.ac.kr"+tester[a+1]["href"])
        print("https://cms.pknu.ac.kr"+tester[a+1]["href"])
        print()


    # print(title_list, date_list, url_list)
    return title_list, date_list, url_list


