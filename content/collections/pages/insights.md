---
id: 75c56cb6-4fcf-4621-8220-bc43ad5986c8
blueprint: page
title: News
author: 7fab386b-3c2a-480d-b06f-dbbe0f8adf74
updated_by: 7fab386b-3c2a-480d-b06f-dbbe0f8adf74
updated_at: 1762411880
template: our_insights/index
description: 'Read the day’s stories, opinion, and investigations. Browse by desk, reporter, or section.'
page_builder:
  -
    id: makpe8u5
    if_have_a_description: true
    if_have_a_tag_title: false
    title: 'News'
    description: 'Read the day’s stories, opinion, and investigations. Browse by desk, reporter, or section.'
    layouts_grid: column
    type: intro_section
    enabled: true
    left_right_text:
      -
        id: mb4zxgu3
        text: 'Browse all stories'
      -
        id: mb4zxk6a
        text: 'Browse By : <span class="text-vividblue-400">Topic</span>'
  -
    id: mb62dsgh
    if_have_a_tag_title: false
    layouts_grid: asymmetric
    collections: our_insights
    filter_type: random
    type: grid_showcase
    enabled: true
  -
    id: mb504jma
    if_have_a_tag_title: false
    layouts_grid: card-based
    card_based_grid: masonry
    collections: our_insights
    limit: 80
    filter_type: latest
    button:
      -
        id: mb506cgp
        icon: image/redirect.svg
        text: 'Read more'
    pagination: 'true'
    type: grid_showcase
    enabled: true
---
