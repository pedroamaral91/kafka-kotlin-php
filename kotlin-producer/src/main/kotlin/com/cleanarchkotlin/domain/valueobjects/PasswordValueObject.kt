package com.cleanarchkotlin.domain.valueobjects

import com.cleanarchkotlin.domain.errors.InvalidParamError
import io.quarkus.elytron.security.common.BcryptUtil

class PasswordValueObject(private val password: String) {
    lateinit var value: String
        private set
    init {
        if (password.isEmpty() || password.length < 8) {
            throw InvalidParamError("password. Must be not empty and must have more than 8 characters")
        }
        value = BcryptUtil.bcryptHash(password)
    }
}