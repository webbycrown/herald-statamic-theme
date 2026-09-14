---
id: a449cb8b-b2da-416f-afa7-4ee914590f8e
blueprint: page
title: Coverage Desks
author: 7fab386b-3c2a-480d-b06f-dbbe0f8adf74
updated_by: 7fab386b-3c2a-480d-b06f-dbbe0f8adf74
updated_at: 1748849776
template: our_services/index
page_builder:
  -
    id: makvv0h6
    if_have_a_description: true
    if_have_a_tag_title: false
    title: 'Coverage Desks'
    description: "City, breaking, markets, politics, and investigations. Each desk files dated stories with a named editor."
    layouts_grid: row
    type: intro_section
    enabled: true
  -
    id: makvwu8q
    if_have_a_tag_title: false
    collections: our_services
    layouts_grid: soft
    filter_type: random
    type: grid_showcase
    enabled: true
    limit: 20
    button:
      -
        id: mb52gbau
        text: 'Read more'
        icon: image/redirect.svg
  -
    id: makw4ei1
    background_image: image/achieve-bg.jpg
    background_video: 'https://www.w3schools.com/html/mov_bbb.mp4'
    title: '"Stories filed before the morning commute."'
    description: 'Read the day’s stories, opinion, and investigations.'
    type: presentations_services
    enabled: true
    reviews:
      -
        id: mbeql0rr
        review_title: 'Readers about the desk'
        avatars:
          -
            id: 5QqKDO85
            image: image/achieve1.png
          -
            id: 5CYZGsdH
            image: image/achieve2.png
          -
            id: GrWZQl3K
            image: image/achieve3.png
          -
            id: mbeqlr8n
            image: image/achieve4.png
        stars: 5
        type: review_group
        enabled: true
  -
    id: makw7jjk
    section_title: 'What readers say about the desk'
    quote_image: image/quote-right.jpg
    grid:
      -
        id: makw7yhs
        image: image/testimonials.jpg
        description: '"I read the overnight budget story before the commute. The tally, the names, and the correction were all on the page."'
        name: 'Kevin Walke'
        position: 'CEO, Founder'
        user_image: image/testimonials-user.png
      -
        id: makwa6uo
        image: image/testimonials.jpg
        description: '"I read the overnight budget story before the commute. The tally, the names, and the correction were all on the page."'
        name: 'Kevin Walke'
        position: 'CEO, Founder'
        user_image: image/testimonials-user.png
      -
        id: makwayh4
        image: image/testimonials.jpg
        description: '"I read the overnight budget story before the commute. The tally, the names, and the correction were all on the page."'
        name: 'Kevin Walke'
        position: 'CEO, Founder'
        user_image: image/testimonials-user.png
    type: left_text_right_image_slider
    enabled: true
parent: home
---
