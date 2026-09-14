---
id: 11fb64a0-e9fd-4dbc-a402-172fd1d20653
blueprint: page
title: Sections
author: 7fab386b-3c2a-480d-b06f-dbbe0f8adf74
template: industries/index
updated_by: 7fab386b-3c2a-480d-b06f-dbbe0f8adf74
updated_at: 1762404628
parent: home
page_builder:
  -
    id: mahtocd1
    if_have_a_description: true
    if_have_a_tag_title: false
    title: Industries
    description: "Sections cover technology, housing, markets, health, and the city. Browse by beat."
    type: intro_section
    enabled: true
    layouts_grid: row
  -
    id: maxwztk5
    if_have_a_tag_title: true
    layouts_grid: card-based
    collections: industries
    limit: 30
    filter_type: random
    button:
      -
        id: maxx0iw5
        text: 'Read more'
        icon: image/redirect.svg
    type: grid_showcase
    enabled: true
    card_based_grid: post
    pagination: 'true'
---
