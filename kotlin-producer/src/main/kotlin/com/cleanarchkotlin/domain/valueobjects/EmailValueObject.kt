package com.cleanarchkotlin.domain.valueobjects

import com.cleanarchkotlin.domain.errors.InvalidParamError

class EmailValueObject(val value: String) {
    init {
        if (value.isEmpty()) {
            throw InvalidParamError("email")
        }
    }
}