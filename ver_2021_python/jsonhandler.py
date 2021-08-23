import crawler

from PyQt5.QtWidgets import QApplication, QWidget, QPushButton, QGridLayout, QFileDialog, QLabel
from PyQt5.QtGui import QIcon
from selenium import webdriver
import time
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException
from openpyxl import load_workbook, Workbook
import sys, os, time


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

def ohora():
    load_wb = load_workbook(excel_path, data_only=True)
    load_ws = load_wb['Sheet1']

    url_list = []
    i = 3
    while True:
        temp = load_ws.cell(i, 9).value
        if temp:
            url_list.append( temp )
        else:
            break
        i += 1

    browser = webdriver.Chrome(executable_path='chromedriver')
    browser.set_window_position(0, 0)
    browser.set_window_size(2000, 2000)

    input_list = []
    k=1
    for i in url_list:
        try:
            browser.get(i)
            last_height = browser.execute_script("return document.body.scrollHeight")
            browser.execute_script("window.scrollTo(0, 800);")
            time.sleep(1)
            main_table = browser.find_element_by_class_name('SP_totalPrdOrderBtn_wrap')
            print(k)
            k += 1
            if "장바구니" in str(main_table.text):
                input_list.append("OOOO")
            else:
                input_list.append("XXXX")
        except:
            browser = webdriver.Chrome(executable_path='chromedriver')
            browser.set_window_position(0, 0)
            browser.set_window_size(2000, 2000)
            browser.get(i)
            last_height = browser.execute_script("return document.body.scrollHeight")
            browser.execute_script("window.scrollTo(0, 800);")
            time.sleep(1)
            main_table = browser.find_element_by_class_name('SP_totalPrdOrderBtn_wrap')
            print(k)
            k += 1
            if "장바구니" in str(main_table.text):
                input_list.append("OOOO")
            else:
                input_list.append("XXXX")

    print(input_list)
    # write_wb =  Workbook()
    # write_ws = write_wb.active
    #
    # for i in range(0, len(input_list)):
    #     write_ws.cell(i+1, 5, input_list[i])
    # write_wb.save(save_path + "/ohara_result.xlsx")
    # write_wb.close()

ohora("./오호라 재고관리.xlsx")  