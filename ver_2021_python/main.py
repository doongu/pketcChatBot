#!/usr/bin/env python3
# -*- coding: utf-8 -*-
from flask import Flask, jsonify, request
import jsonhandler
from werkzeug.utils import secure_filename
import os

app = Flask(__name__)
app.config['JSON_AS_ASCII'] = False #
@app.route("/notice/ce", methods = ["POST"])
def ce():
    return jsonhandler.ce_notice()


@app.route("/lib/center", methods = ["POST"])
def lib_center():
    return "코로나 19로 휴관중입니다."

# json형식으로 받음
@app.route("/test_log", methods = ['POST'])
def walk_data_to_db():
    json_data = request.get_json()
    print("성공적으로 연동하였습니다.")
    print(json_data)
    responseBody = {
    "version": "2.0",
    "template": {
      "outputs": [
        {
          "simpleText": {
            "text": "hello I'm Ryan"
          }
        }
      ]
    }
  }
    return jsonify(responseBody)



if __name__ == '__main__':
    app.run(host = '0.0.0.0', port = 80, debug = True)