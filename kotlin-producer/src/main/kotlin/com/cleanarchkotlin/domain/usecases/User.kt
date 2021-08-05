package com.cleanarchkotlin.domain.usecases

import com.cleanarchkotlin.domain.valueobjects.EmailValueObject
import com.cleanarchkotlin.domain.valueobjects.PasswordValueObject

data class User (val email: EmailValueObject, val password: PasswordValueObject, val name: String)