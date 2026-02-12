from sqlmodel import Session
from fastapi import HTTPException, status
from app.services.user_service import UserService
from app.core.security import verify_password, create_access_token


class AuthService:

    @staticmethod

    def authenticate(db:Session,email:str,password:str):
        user = UserService.get_by_email(db,email)

        if not user or not verify_password(password,user.hashed_password):
            raise HTTPException(
                status_code=status.HTTP_401_UNAUTHORIZED,
                detail="Email ou mot de passe incorrect",
                headers={"WWW-Authenticate": "Bearer"},
            )
        token = create_access_token(subject=user.id)
        return {"access_token": token, "token_type": "bearer"}

